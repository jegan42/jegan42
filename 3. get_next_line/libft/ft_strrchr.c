/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strrchr.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/04 10:53:03 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/04 10:53:05 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strrchr(const char *s, int c)
{
	int	exist;

	exist = 0;
	while (*s)
	{
		if (*s == (char)c)
			++exist;
		s++;
	}
	if (!c)
		return ((char *)s);
	while (exist && *s != (char)c)
		s--;
	if (*s == (char)c)
		return ((char *)s);
	return ((char *)0);
}
