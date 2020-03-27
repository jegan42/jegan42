/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_nbc.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/06/02 10:48:41 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/02 17:00:49 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

int		ft_nbc(const char *s, char c)
{
	int		i;
	int		nbc;

	nbc = 0;
	if (s && (i = -1))
		while (s[++i])
			if (s[i] && (s[i] == c))
				++nbc;
	return (nbc);
}
